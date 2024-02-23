# ecommerce

## Instalación

clonar el proyecto

```bash
git clone https://github.com/AlexMontoya6/ecommerce.git

```

levantar los contenedores

alias dcr="docker-compose up -d nginx mysql workspace phpmyadmin"

```bash
docker-compose up -d nginx mysql workspace phpmyadmin
```

entrar en el contenedor workspace

alias dcw="docker-compose exec --user=laradock workspace bash"

```bash
docker-compose exec --user=laradock workspace bash
```

copiar el .env.example a .env

```bash
cp .env.example .env
```

ejecutar composer update/install

```bash
composer update
```

crear enlace simbolico

```bash
art storage:link
```

ejecutar las migraciones y los seeders

```bash
art migrate --seed
```

para ejecutar todos los pasos (asegurar de que tenga permisos de ejecucion)

```bash
chmod +x setup.sh
```

```bash
./setup.sh
```
## laravel Dusk configuración:

instalar google-chrome por consola 

```bash
curl -LO https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb

apt-get install -y ./google-chrome-stable_current_amd64.deb
```

y los chromedriver dentro de la carpeta vendor/bin/ y la version tiene que coincidir.


```bash
wget https://storage.googleapis.com/chrome-for-testing-public/121.0.6167.85/linux64/chromedriver-linux64.zip

unzip chromedriver-linux64.zip
```

editar .env.dusk.local copiando:

```dotenv
DUSK_DRIVER_URL="http://172.27.0.2:4444"

CHROME_DRIVER_BIN_PATH="/usr/bin/google-chrome"
```

