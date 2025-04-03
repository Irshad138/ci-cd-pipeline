pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                // Clone the repository. Change the URL to your repository’s URL.
                git branch: 'main', url: 'https://github.com/Irshad138/ci-cd-pipeline.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Update packages and install PHP dependencies if needed.
                sh 'sudo apt update'
                sh 'sudo apt install php-cli php-mbstring unzip -y'
                // Optionally, run Composer if your project uses it.
                // sh 'composer install'
            }
        }

        stage('Deploy Application') {
            steps {
                // Copy the files to the web server directory.
                // Adjust the destination directory as per your server configuration.
                sh 'sudo cp -r * /var/www/html/'
                // Restart Apache to reflect changes.
                sh 'sudo systemctl restart apache2'
            }
        }
    }
}
