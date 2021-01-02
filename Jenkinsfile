pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        echo 'Build'
      }
    }

    stage('Test') {
      parallel {
        stage('Test') {
          steps {
            echo 'Test'
          }
        }

        stage('') {
          steps {
            echo 'Run Coverage'
            sh 'bash <(curl -s https://codecov.io/bash)'
          }
        }

      }
    }

    stage('Deploy') {
      steps {
        echo 'Deploy'
      }
    }

  }
}