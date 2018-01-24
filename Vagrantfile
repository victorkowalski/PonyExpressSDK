# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "ubuntu/trusty64"

  config.vm.synced_folder ".", "/vagrant", :owner=> 'vagrant', :group=>'www-data', :mount_options => ["dmode=775,fmode=775"]
  config.ssh.forward_agent = true

  config.vm.provider "virtualbox" do |v|
    v.memory = 1024
    v.cpus = 1
  end

  config.vm.provision :shell, path: "shell/provision.sh"
  config.vm.network "private_network", ip: "192.168.56.10"
  config.vm.hostname = 'web'
end