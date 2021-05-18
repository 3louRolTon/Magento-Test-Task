# Requiered plugins
# -*- mode: ruby -*-
# vi: set ft=ruby :
rootPath = File.dirname(__FILE__)
require 'yaml'
require "#{rootPath}/dependency.rb"

# Load yaml configuration
vConfig = YAML.load_file("#{rootPath}/config.yaml")

# Check plugin
check_plugins ['vagrant-hostsupdater', 'vagrant-vbguest', 'vagrant-mutagen', 'vagrant-disksize']

# Vagrant configureHypervisorType
Vagrant.configure("2") do |config|
    # Virtual machine
    config.vm.box = vConfig['vmconf']['box']

    # Mutagen settings
    config.mutagen.orchestrate = true

    # Host manager configuration
    config.vm.network :private_network, ip: vConfig['vmconf']['network_ip']

    # VBox config
    config.vm.provider 'virtualbox' do |v|
        # Basic Settings
        v.name   = vConfig['vmconf']['machine_name']
        v.memory = vConfig['vmconf']['memory']
        v.cpus   = vConfig['vmconf']['cpus']

        #v.linked_clone = false
        #v.update_guest_tools = true
        # Use multiple CPUs in VM
        v.customize ['modifyvm', :id, '--ioapic', 'on']
    end

    # Virtualhosts
    config.vm.hostname = vConfig['magento']['url']
    config.hostsupdater.aliases = vConfig['magento']['url_aliases'].split(" ")

    # Default options
    #config.vm.synced_folder '.', '/vagrant', disabled: true
    config.vm.synced_folder '.', '/vagrant', type: "nfs"

    #config.vm.synced_folder './provision', '/vagrant/provision'
    #config.vm.synced_folder './tools', '/vagrant/tools'
    #config.vm.synced_folder './data', '/vagrant/data'

    # Environment provisioning
    config.vm.provision 'shell', path: 'provision/env.sh', run: 'always', keep_color: true, args: [
        vConfig['db']['name'], vConfig['db']['user'], vConfig['db']['password'],
        vConfig['server']['php_version'], vConfig['server']['time_zone'],
        vConfig['server']['php_debug_fpm_ip'], vConfig['server']['php_debug_cli_ip'],
        vConfig['server']['site_folder'], vConfig['magento']['url'], vConfig['magento']['url_aliases'],
        vConfig['composer']['auth'],
        vConfig['magento']['install'], vConfig['magento']['version'], vConfig['magento']['edition'],
        vConfig['magento']['mode'], vConfig['magento']['sample'], vConfig['magento']['language'],
        vConfig['magento']['currency'], vConfig['magento']['time_zone']
    ]

    config.vm.provision 'shell', path: 'provision/setup.sh', keep_color: true
    config.vm.provision 'shell', path: 'provision/configure.sh', keep_color: true
    config.vm.provision 'shell', path: 'provision/magento.sh', keep_color: true, privileged: false
    config.vm.provision 'shell', path: 'provision/finalizing.sh', keep_color: true, privileged: false
end
