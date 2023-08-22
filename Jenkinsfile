pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install'
            }
        }

        stage('Run Tests') {
            steps {
                sh 'php bin/phpunit'
            }
        }

        stage('Build & Deploy') {
            steps {
                echo 'Le pipeline fonctionne correctement !'
            }
        }
    }
}