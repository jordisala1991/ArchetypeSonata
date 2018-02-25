ansible-run () {
    ansible-playbook /vagrant/ansible/playbook.yml -i "localhost," -c local --tags "$1";
}
