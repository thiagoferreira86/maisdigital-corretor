#!/bin/bash
echo "🔁 Resetando ambiente local para branch dev"
git checkout dev
git fetch origin
git reset --hard origin/dev
git clean -fd
echo "✅ Ambiente atualizado com último commit do dev"
