# Rappatrier les changements depuis le github de Poil

    cd /data/www/sites/CGraphz_2.40
    git checkout 2.40
    git pull

# Merger les changements de la branche 2.40 vers la branche Claranet_2.40

    cd /data/www/sites/CGraphz_2.40
    git checkout Claranet_2.40
    git merge 2.40

# Pousser les changments de la branche Claranet_2.40 dans le repo gitlab

    cd /data/www/sites/CGraphz_2.40
    git checkout 2.40
    git add *
    git commit -a
    git push 
    # ou en cas de soucis : git push -u Claranet_2.40 Claranet_2.40