# open git baash and run ./clean_git.sh
python -m git_filter_repo --force --commit-callback "commit.author_name=b'anishaneupne100-design'; commit.author_email=b'anisha.neupne.100@gmail.com'; commit.committer_name=b'anishaneupne100-design'; commit.committer_email=b'anisha.neupne.100@gmail.com'"

git remote add origin https://github.com/anishaneupne100-design/forestsoul_php.git

git branch -M main

git push -u origin main --force
