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

# =====================================
# CHECK git-filter-repo
# =====================================
$filterRepoExists = git filter-repo --help 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "ERROR: git-filter-repo not installed."
    Write-Host "Install it using: pip install git-filter-repo"
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
# REWRITE ALL COMMITS (SAFE WAY)
# =====================================
git filter-repo --force --commit-callback "
commit.author_name  = b'$NEW_NAME'
commit.author_email = b'$NEW_EMAIL'
commit.committer_name  = b'$NEW_NAME'
commit.committer_email = b'$NEW_EMAIL'
"

# =====================================
# FORCE PUSH TO GITHUB
# =====================================
git push --force --all
git push --force --tags

Write-Host "SUCCESS: All commits rewritten correctly."
Write-Host "GitHub will now show the new name and email."
