#!/usr/bin/env bash

if [[ ! -f ./app/.env.local ]]; then
    cp ./app/.env ./app/.env.local
fi

