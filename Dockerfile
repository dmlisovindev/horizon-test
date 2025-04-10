FROM alpine:latest

ARG SOURCE_FOLDER=/source
ENV DEST_FOLDER=/tmp/code

RUN addgroup -g 82 -S www-data ; \
  adduser -u 82 -D -S -G www-data www-data;

WORKDIR $SOURCE_FOLDER

RUN mkdir -p $SOURCE_FOLDER
ADD . $SOURCE_FOLDER
RUN mkdir -p $SOURCE_FOLDER/storage/
RUN mkdir -p $SOURCE_FOLDER/bootstrap/cache/
RUN chmod 777 $SOURCE_FOLDER/storage/
RUN chmod 777 $SOURCE_FOLDER/bootstrap/cache/
CMD ["sh", "-c", "rm -rf $DEST_FOLDER/*; cp -rp * $DEST_FOLDER; cp -rp . $DEST_FOLDER; chown www-data:www-data $DEST_FOLDER -Rf; chmod 777 $DEST_FOLDER/storage/ -Rf;  chmod 777 $DEST_FOLDER/bootstrap/cache/ -Rf"]