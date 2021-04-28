FROM nginx:alpine AS standard

# Get SSL Cert
RUN apt-get install -y software-properties-common \
    && add-apt-repository -y ppa:certbot/certbot \
    && apt update \
    && apt install -y certbot \
    && certbot certonly \
    --manual -d *.ouxsoft.com -d ouxsoft.com \
    --agree-tos -m webmaster@ouxsoft.com \
    --no-bootstrap --manual-public-ip-logging-ok --preferred-challenges dns-01 \
    --server https://acme-v02.api.letsencrypt.org/directory