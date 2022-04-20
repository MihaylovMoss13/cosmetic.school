FROM node:12.16.3-alpine3.9

RUN mkdir -p /var/www/dockerize-nuxt/nuxt-app
WORKDIR /var/www/dockerize-nuxt/nuxt-app

COPY package*.json ./
RUN npm install

COPY . .

RUN npm run dev

EXPOSE 80

ENV NUXT_HOST=0.0.0.0

ENV NUXT_PORT=80

CMD [ "npm", "start" ]