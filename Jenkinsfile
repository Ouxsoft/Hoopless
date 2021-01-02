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

        stage('error') {
          steps {
            echo 'Run Coverage'
            sh '''curl -s https://codecov.io/bash | bash -s -- -c -F aFlag -f .codacy.yml
'''
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