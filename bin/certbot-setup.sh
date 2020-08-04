# Get SSL Cert
apt-get install -y software-properties-common
add-apt-repository -y ppa:certbot/certbot
apt update
apt install -y certbot
certbot certonly \
--apache \
--manual -d *.ouxsoft.com -d ouxsoft.com \
--agree-tos -m webmaster@ouxsoft.com \
--no-bootstrap --manual-public-ip-logging-ok --preferred-challenges dns-01 \
--server https://acme-v02.api.letsencrypt.org/directory