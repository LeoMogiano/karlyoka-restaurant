#!/bin/bash

# Renombrar las ramas locales para usar "feature" en lugar de "feat"
git checkout feat/create-categories && git branch -m feature/create-categories
git checkout feat/create-user && git branch -m feature/create-user
git checkout feat/delete-category && git branch -m feature/delete-category
git checkout feat/delete-user && git branch -m feature/delete-user
git checkout feat/list-categories && git branch -m feature/list-categories
git checkout feat/list-users && git branch -m feature/list-users
git checkout feat/manage-products && git branch -m feature/manage-products
git checkout feat/search-category && git branch -m feature/search-category
git checkout feat/search-user && git branch -m feature/search-user

# Eliminar las ramas antiguas del remoto que usan "feat"
git push origin --delete feat/create-categories
git push origin --delete feat/create-user
git push origin --delete feat/delete-category
git push origin --delete feat/delete-user
git push origin --delete feat/list-categories
git push origin --delete feat/list-users
git push origin --delete feat/manage-products
git push origin --delete feat/search-category
git push origin --delete feat/search-user

# Subir las nuevas ramas con el prefijo "feature" al remoto
git push origin feature/create-categories
git push origin feature/create-user
git push origin feature/delete-category
git push origin feature/delete-user
git push origin feature/list-categories
git push origin feature/list-users
git push origin feature/manage-products
git push origin feature/search-category
git push origin feature/search-user
