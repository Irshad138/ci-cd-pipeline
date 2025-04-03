pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/Irshad138/ci-cd-pipeline'
            }
        }

        stage('PHP Syntax Check') {
            steps {
                sh 'php -l index.php'
            }
        }

        stage('Deploy to Apache Server') {
            steps {
                sshagent(['ssh-key-ubuntu']) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ubuntu@34.205.71.219 <<EOF
                    cd /var/www/html/ci-cd-pipeline
                    git pull origin main
                    sudo systemctl restart apache2
                    EOF
                    '''
                }
            }
        }
    }
}
