FROM ubuntu:latest

RUN apt-get update \
    && apt-get install -y nginx

COPY default.conf /etc/nginx/conf.d/default.conf
COPY ./includes/ /etc/nginx/includes/
#RUN nginx -t

EXPOSE 80

# Define our command to be run when launching the container
CMD ["nginx", "-g", "daemon off;"]