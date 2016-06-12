Vagrant.require_version '>= 1.8.3'

Vagrant.configure('2') do |config|
    config.vm.provider :virtualbox do |v|
        v.name = 'sonata_archetype_vm'
        v.customize [
            'modifyvm', :id,
            '--name', 'sonata_archetype_vm',
            '--memory', 2048,
            '--natdnshostresolver1', 'on',
            '--cpus', 2,
        ]
    end

    config.vm.box = 'ubuntu/trusty64'
    config.vm.network :private_network, ip: '192.168.33.99'
    config.vm.synced_folder './', '/vagrant', type: 'nfs', mount_options: ['actimeo=1']
    config.ssh.forward_agent = true

    config.vm.provision 'ansible_local' do |ansible|
        ansible.playbook = 'ansible/playbook.yml'
        ansible.install_mode = :pip
        ansible.version = '2.0'
    end
end
