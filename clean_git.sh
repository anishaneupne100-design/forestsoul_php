#!/bin/bash

NEW_NAME="anishaneupne100-design"
NEW_EMAIL="anisha.neupne.100@gmail.com"

# Safety check
if [ ! -d ".git" ]; then
  echo "ERROR: Not a git repository"
  exit 1
fi

echo "WARNING: This will rewrite ALL commits and force push."
read -p "Press ENTER to continue or CTRL+C to cancel..."

# Set future commits
git config user.name "$NEW_NAME"
git config user.email "$NEW_EMAIL"

git config --global user.name "$NEW_NAME"
git config --global user.email "$NEW_EMAIL"

# Rewrite commit history
git filter-branch --force --env-filter '
export GIT_AUTHOR_NAME="$NEW_NAME"
export GIT_AUTHOR_EMAIL="$NEW_EMAIL"
export GIT_COMMITTER_NAME="$NEW_NAME"
export GIT_COMMITTER_EMAIL="$NEW_EMAIL"
' -- --all

# Force push
git push --force --all
git push --force --tags

echo "SUCCESS: All commits rewritten."
