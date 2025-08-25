#!/bin/bash

git checkout dev
git fetch --all --prune

merged_branches=()
failed_branches=()

for branch in $(git branch -r | grep origin/ | grep -v 'origin/dev'); do
    branch_name=${branch#origin/}
    
    echo "🔄 Merging $branch_name into dev..."
    
    if git merge origin/$branch_name --no-edit; then
        echo "✅ $branch_name merged (or already up to date)"
        merged_branches+=("$branch_name")
    else
        echo "❌ $branch_name merge failed"
        failed_branches+=("$branch_name")
    fi
done

echo
echo "==================== MERGE SUMMARY ===================="
echo "✅ Successfully merged or already up to date:"
for b in "${merged_branches[@]}"; do
    echo "   - $b"
done

echo "--------------------------------------------------------"

if [ ${#failed_branches[@]} -gt 0 ]; then
    echo "❌ Failed to merge:"
    for b in "${failed_branches[@]}"; do
        echo "   - $b"
    done
else
    echo "🎉 No merge failures!"
fi
echo "========================================================"
