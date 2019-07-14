# CASTIC Docker Container Testing

Run four ssh enabled containers with command net-tools and pre-defined accounts.

## Getting Started

Make sure you understand some basic commands when running and stopping docker containers.

### Prerequisites

Things you need to install and how to install them:

- [Docker](https://docs.docker.com/install/)
- [docker-compose](https://docs.docker.com/compose/install/)
- [Ansible](https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html)

`git clone https://<YOUR ACCOUNT NAME>@bitbucket.org/casticlinux/castic-docker.git`  
Within `ansible_stack/` run `docker-compose` command like so.  
`docker-compose up -d`  
The `-d` is for detached which runs the containers in the background.  

### Ansible Configurations

Enter the following like so within your host file:

``` text
[containers]
host1 ansible_ssh_port=32751 ansible_ssh_host=test.ad.fiu.edu
host2 ansible_ssh_port=32752 ansible_ssh_host=test.ad.fiu.edu
host3 ansible_ssh_port=32753 ansible_ssh_host=test.ad.fiu.edu
host4 ansible_ssh_port=32754 ansible_ssh_host=test.ad.fiu.edu
```

NOTE: Make sure to change test.ad.fiu.edu to your hostname

Test connection with:

`ansible containers -m command -a "hostname"`

``` bash
host4 | SUCCESS | rc=0 >>
ubuntu_two.ansible.castic

host3 | SUCCESS | rc=0 >>
ubuntu_one.ansible.castic

host1 | SUCCESS | rc=0 >>
centos_one.ansible.castic

host2 | SUCCESS | rc=0 >>
centos_two.ansible.castic
```

## Deployment

NA

## Built With

docker

## Contributing

NA

## Versioning

NA

## Authors

* **Joseph Martinez** - *Initial work* - [Bitbucket CASTIC](https://josephsmartinez@bitbucket.org/casticlinux/castic-docker.git)

## License

NA

## Acknowledgments

NA