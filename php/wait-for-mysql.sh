#!/bin/bash
# Attendre que MySQL soit prêt
until mysql -h mysql -u user -puserpass -e "SHOW DATABASES;" > /dev/null 2>&1; do
  echo "⏳ En attente de MySQL..."
  sleep 2
done

# Lancer Apache
apache2-foreground
