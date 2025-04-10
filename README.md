

# Horizon test

A demo project that provides a way to get familiar with Laravel Horizon and learn its capabilities. The project allows the user to dispatch jobs in real-time with set parameters to emulate various load on queue workers. 


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

## Prerequisites

* Ubuntu 16.04 or newer

## Setup project with Docker

* Install [Docker](https://docs.docker.com/install/)

[How to install Docker on Ubuntu](https://docs.docker.com/install/linux/docker-ce/ubuntu/):

```
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    software-properties-common
```

```
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```

```
sudo add-apt-repository \
       "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
       $(lsb_release -cs) \
       stable"
```

```
sudo apt-get update
```

```
sudo apt-get -y install docker-ce
```

Create the docker group

```
sudo groupadd docker
sudo usermod -aG docker $USER
```

[How to install Docker on Mac](https://docs.docker.com/docker-for-mac/install/)

* Install [Docker Compose](https://docs.docker.com/compose/install/)

How to install on Ubuntu:

```
sudo curl -L "https://github.com/docker/compose/releases/download/1.24.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
```

```
sudo chmod +x /usr/local/bin/docker-compose
```

* Install [docker-hostmanager](https://github.com/iamluc/docker-hostmanager) (optional)

[How to install on Ubuntu](https://github.com/iamluc/docker-hostmanager#linux):

```
docker run -d --name docker-hostmanager --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v /etc/hosts:/hosts iamluc/docker-hostmanager
```

**WARNING**: docker-hostmanager is not working on Mac

## Run project with Docker


Clone the repository into /var/www/ and run the following commands:
```
cd /var/www/horizon-test
docker-compose up -d --build
docker-compose exec --user $(id -u):$(id -g) php composer install
docker-compose exec --user $(id -u):$(id -g) php php artisan migrate
docker-compose exec --user $(id -u):$(id -g) php php artisan db:seed
```

Then, open http://localhost:8085/ to test the project.

## Coding style

[PHP PSR-12](https://www.php-fig.org/psr/psr-12/)

## License

Information about License. Only for internal projects. 

## Acknowledgments

[LICENSE-DEPENDENCIES.md](LICENSE-DEPENDENCIES.md)

Generate a list of used package licenses

```
cd /var/www/{project-name}
composer licenses
```
