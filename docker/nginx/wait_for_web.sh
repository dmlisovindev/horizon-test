echo "HELLO i am nginx sh!"
while true; do
 NMAP=$(nmap -p 8000 web)
 if echo "$NMAP" | grep "Host is up"; then
    echo "Nginx will be started and connected to the web service"
    break
 fi
 sleep 2
 done

# sh -c "sed -i 's/NGINX_DOMAIN/sandbox.meonly.co/g' /etc/nginx/conf.d/*.conf; nginx -g 'daemon off;'"
