FROM node:14.16.0-alpine

WORKDIR /home/node/app

COPY package*.json ./
COPY . .

CMD yarn install --verbose && yarn start

EXPOSE 7770