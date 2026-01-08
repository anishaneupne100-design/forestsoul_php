# =====================================
# NEW COMMIT IDENTITY (CHANGE THESE)
# =====================================
$NEW_NAME  = "anishaneupne100-design"
$NEW_EMAIL = "anisha.neupne.100@gmail.com"

# =====================================
# SAFETY CHECK
# =====================================
if (-not (Test-Path ".git")) {
    Write-Host "ERROR: Not a git repository"
    exit 1
}

Write-Host "WARNING: This will rewrite ALL commits and force push."
Write-Host "Press ENTER to continue or CTRL+C to cancel..."
Read-Host

# =====================================
# SET FUTURE COMMITS
# =====================================
git config user.name "$NEW_NAME"
git config user.email "$NEW_EMAIL"

git config --global user.name "$NEW_NAME"
git config --global user.email "$NEW_EMAIL"

# =====================================
# REWRITE ALL COMMITS
# =====================================
git filter-branch --force --env-filter '
export GIT_AUTHOR_NAME="'"$NEW_NAME"'"
export GIT_AUTHOR_EMAIL="'"$NEW_EMAIL"'"
export GIT_COMMITTER_NAME="'"$NEW_NAME"'"
export GIT_COMMITTER_EMAIL="'"$NEW_EMAIL"'"
' -- --all

# =====================================
# FORCE PUSH TO GITHUB
# =====================================
git push --force --all
git push --force --tags

Write-Host "SUCCESS: All commits updated."
Write-Host "GitHub will now show the new name and email."
