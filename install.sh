#!/bin/bash
YELLOW='\e[38;2;255;255;0m'
GREEN='\e[38;2;0;255;0m'
RED='\e[38;2;255;0;0m'
BG_BLUE='\e[48;2;0;20;40m'
NC='\033[0m'
BOLD='\x1b[1m'
NORMAL='\x1b[2m'
BLINKING='\x1b[5m'

menu=([0]=sair [1]=migrations [2]=seed)

docker network create mentesnotaveis --subnet=192.168.32.0/24
docker-compose build app
docker-compose up -d


menuPrincipal() {
echo -e "${BG_BLUE}${BOLD}                                                       ${NC}"
  echo -e "${BG_BLUE}${YELLOW}     SISTEMA INSTALADO COM SUCESSO:                    ${NC}"
  echo -e "${BG_BLUE}${YELLOW}     Selecione uma opção:                              ${NC}"
  echo -e "${BG_BLUE}                                                       ${NC}"
  echo -e "${BG_BLUE}${GREEN}   🔸 1  Instalar todas as tabelas no banco de dados   ${NC}"
  echo -e "${BG_BLUE}${GREEN}   🔸 2  Subir todos os dados da tabela estados        ${NC}"
  echo -e "${BG_BLUE}${GREEN}   🔸 0  Sair                                          ${NC}"
  echo -e "${BG_BLUE}${GREEN}                                                       ${NC}\n"

  echo -e -n "${YELLOW} Digite a opção desejada ${BLINKING}: ${NC}"
  read indice

  if [ $indice -eq 0 ]; then
    echo ""
    echo -e "${RED}${BOLD} SAINDO  ${NC}"
    echo ""
    exit
    elif [ $indice -eq 1 ]; then
    echo -e "${GREEN}${BOLD} Instalando as tabelas no banco de dados  ${NC}"
        migrations
    elif [ $indice -eq 2 ]; then
    echo -e "${GREEN}${BOLD} Fazendo insert na tabela STATES  ${NC}"
        seed
    fi
actionPri=${menu[$indice]}
}

migrations() {
    sudo docker exec -it mentesnotaveis-app bash -c "php artisan migrate --force"
    menuPrincipal
}

seed() {
    docker exec -it mentesnotaveis-app bash -c "php artisan db:seed --class=StatesSeeder"
    menuPrincipal
}
menuPrincipal

