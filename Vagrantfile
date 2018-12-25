# -*- mode: ruby -*-
# vi: set ft=ruby :

private_key_path = File.join(Dir.home, ".ssh", "id_rsa")
public_key_path = File.join(Dir.home, ".ssh", "id_rsa.pub")
insecure_key_path = File.join(Dir.home, ".vagrant.d", "insecure_private_key")

private_key = IO.read(private_key_path)
public_key = IO.read(public_key_path)

Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/trusty64"
  config.ssh.forward_agent    = true
  # config.vm.provision 'file',
  #   source: public_key_path,
  #   destination: '~/.ssh/me.pub'

  config.ssh.insert_key = false
  config.ssh.private_key_path = [
    private_key_path,
    insecure_key_path # to provision the first time
  ]

  config.vm.provision :shell, privileged: false, :inline => <<-SCRIPT
    set -e

    echo '#{private_key}' > /home/vagrant/.ssh/id_rsa
    chmod 600 /home/vagrant/.ssh/id_rsa

    echo '#{public_key}' > /home/vagrant/.ssh/authorized_keys
    chmod 600 /home/vagrant/.ssh/authorized_keys
  SCRIPT

end
