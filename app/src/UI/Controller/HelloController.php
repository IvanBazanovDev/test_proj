<?php

namespace App\UI\Controller;

use App\Application\Service\CreateSessionService\CreateSessionServiceInterface;
use App\Application\Service\GetAnswerService\GetAnswerServiceInterface;
use App\Application\Service\GetTestService\GetTestServiceInterface;
use App\Domain\Entity\Session;
use App\Domain\Entity\Test;
use App\Domain\Entity\ValueObject\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    public function __construct(
        private GetTestServiceInterface $getTestService,
        private CreateSessionServiceInterface $createSessionService,
        private GetAnswerServiceInterface $getAnswerService,
    ) {
    }

    #[Route('/', name: 'random_test')]
    public function randomTest(): Response
    {
        $test = $this->getTestService->getRandomTest();

        return $this->render('test/show.html.twig', [
            'test' => $test,
        ]);
    }

    #[Route('/test/{id}/submit', name: 'test_submit')]
    public function submit(Test $test, Request $request): Response
    {
        $requestData = $request->request->all();
        $rawData = $requestData['answers'] ?? null;

        $result = [];

        foreach ($rawData as $questionId => $question) { // TODO: конвертить данные через отедльный сервис + нужна дтошка
            if (!isset($question['answers'])) {
                $result[$questionId]['text'] = $question['text'];
                $result[$questionId]['isCorrect'] = false;
                continue;
            }

            $result[$questionId]['text'] = $question['text'];
            $isQuestionCorrect = true;

            foreach ($question['answers'] as $answerId => $answerText) {
                $answer = $this->getAnswerService->getById(new Id($answerId));
                $isAnswerCorrect = $answer->isCorrect();

                if (!$isAnswerCorrect) {
                    $isQuestionCorrect = false;
                }

                $result[$questionId]['answers'][$answerId]['isCorrect'] = $isAnswerCorrect;
                $result[$questionId]['answers'][$answerId]['text'] = $answer->getText();
            }

            $result[$questionId]['isCorrect'] = $isQuestionCorrect;
        }

        $jsonResult = json_encode($result);
        $session = $this->createSessionService->create($test, $jsonResult);

        return $this->redirectToRoute('test_results', ['id' => $session->getId()]);
    }

    #[Route('/test/{id}/results', name: 'test_results')]
    public function showResults(Session $session): Response
    {
        $sessionResults = $session->getResult();

        return $this->render('test/results.html.twig', [
            'sessionResults' => json_decode($sessionResults, true),
        ]);
    }
}
