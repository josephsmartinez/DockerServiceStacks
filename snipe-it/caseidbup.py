'''
Script Version 0.0.2
- Config file should be cleaned after run
MAINTAINEr: Voltaire
'''
import subprocess, re, string

def getapp_key() -> str:
  '''
  Run docker container once to get applicaiton key
  '''
  result = subprocess.run(['docker', 'run', '--rm', 'snipe/snipe-it'], stdout=subprocess.PIPE)
  key = result.stdout.decode('utf-8').splitlines()
  #print(key[2])
  return key[2]

def caseidb(key: str):
  '''
  Add app-key to file and restart app stack
  '''
  path = 'docker-compose.yml'
  try:
    # Read in the file
    with open(path, 'r') as file :
      filedata = file.read()
    # Replace the target string
    filedata = filedata.replace('    - APP_KEY=<ENTER_KEY>', '    - APP_KEY='+key[2])
    # Write the file out again
    with open(path, 'w') as file:
      file.write(filedata)
  finally:  
    file.close()
  result = subprocess.run(['docker-compose', 'up', '-d'], stdout=subprocess.PIPE)
  print(result)

def cleanup():
  pass

# Run application
print('Make sure lastest Docker and Python is installed!')
run_app = input('Run [y/n] ')
if run_app:
  key = getapp_key()
  caseidb(key)
  cleanup()