Vagrant.require_version '>= 1.8.5'

Vagrant.configure('2') do |config|
    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.manage_guest = true

    config.vm.provider :virtualbox do |v|
        v.customize [
            'modifyvm', :id,
            '--name', 'sonata-vm',
            '--cpus', 1,
            '--memory', 1024,
            '--natdnshostresolver1', 'on',
            '--nictype1', 'virtio',
            '--nictype2', 'virtio',
        ]
    end

    config.vm.define 'sonata-vm' do |node|
        node.vm.box = 'ubuntu/xenial64'
        node.vm.network :private_network, ip: '192.168.33.99', nic_type: 'virtio'
        node.vm.hostname = 'sonata.local'
        node.hostmanager.aliases = []

        node.vm.synced_folder './', '/vagrant', type: 'nfs', nfs_udp: false, mount_options: ['actimeo=1']
        node.ssh.forward_agent = true
    end

    config.vm.provision 'ansible_local' do |ansible|
        ansible.playbook = 'ansible/playbook.yml'
    end
end
