# MyFlix

MyFlix is an application for Content Creators, so they can upload video content for viewers

## Installation for production

### Ubuntu 20.04 (Docker)
Tested on Docker 20.10.11 and docker-compose 1.29.2
#### 1. Install docker

Install docker using the documentation
on [https://docs.docker.com/engine/install/ubuntu/](https://docs.docker.com/engine/install/ubuntu/)

#### 2. Install docker-compose

Download the executable

```bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
```

Make the file executable

```bash
sudo chmod +x /usr/local/bin/docker-compose
```

#### 3. Download the code of MyFlix

```bash
git clone git@github.com:cedsmit/MyFlix.git
```

#### 4. Navigate to the folder

```bash
cd MyFlix
```

#### 5. Copy env file

Copy the `.env.example` file to `.env` and change the settings if needed

#### 5. Start the container

```bash
docker-compose up
```

#### 6. Import the database

Go in your web browser to the following url by going to [http://localhost/installdb.php]()

## Installation for Development

### Windows (Xampp)

Tested on Windows 10 and Xampp version 8.0.13

#### 1. Install Xampp from the official site

[https://www.apachefriends.org/xampp-files/8.0.13/xampp-windows-x64-8.0.13-1-VS16-installer.exe
]()

#### 2. Download the code of MyFlix

Navigate to `C:/Xampp/htdocs/` and git clone here the project

```bash 
git clone git@github.com:cedsmit/MyFlix.git .
```

#### 3. Open Xampp and start Apache en Mysql

#### 4. Import the database by going to [http://localhost/installdb.php]()