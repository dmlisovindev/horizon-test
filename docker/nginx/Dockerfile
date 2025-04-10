FROM nginx:stable-alpine

#Installing needed packages via apk
RUN apk update && apk add nmap

# Custom Nginx config
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./conf.d/ /etc/nginx/conf.d/
# COPY ./certs/ /etc/nginx/ssl/
COPY wait_for_web.sh /etc/nginx/wait_for_web.sh
EXPOSE 80 443

CMD ["nginx", "-g", "daemon off;"]