Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  config.vm.network "private_network", ip: "192.168.100.70"
  config.vm.synced_folder "./bootstrap_files", "/bootstrap_files"
  config.vm.provision :shell, path: "bootstrap.sh"
end
