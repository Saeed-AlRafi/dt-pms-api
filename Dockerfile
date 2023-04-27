FROM ghcr.io/islamic-network/php:8.1-unit

# Copy files
COPY . /var/www/
#COPY etc/apache2/mods-enabled/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf

COPY etc/unit/.unit.conf.json /docker-entrypoint.d/.unit.conf.json

# Run Composer
RUN cd /var/www && composer install --no-dev

# Set the correct permissions
#RUN chown -R www-data:www-data /var/www/
RUN chmod 755 /usr/local/bin/doctrine-proxies.sh

ENTRYPOINT ["/usr/local/bin/doctrine-proxies.sh"]
CMD ["unitd", "--no-daemon", "--control", "unix:/var/run/control.unit.sock"]
# The correct environment variables are set in the docker-compose file. Set any other ones here.

###############################################################################################################
## If you are using Doctine ORM, comment out the next 3 lines to generate proxies at container startup time. ##
# COPY bin/doctrine/proxies.sh /usr/local/bin/doctrine-proxies.sh
# RUN chmod -R 777 /tmp && chmod 755 /usr/local/bin/doctrine-proxies.sh
# CMD ["/usr/local/bin/doctrine-proxies.sh"]
###################################### Doctrine Proxies end ###################################################
