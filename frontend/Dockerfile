FROM node:12.16.3-alpine3.9
ENV APP_ROOT /frontend
ENV NODE_ENV production

RUN mkdir ${APP_ROOT}
WORKDIR ${APP_ROOT}
ADD . ${APP_ROOT}

COPY package*.json ./
RUN npm install

COPY . .

# RUN npm run start

# EXPOSE 3000

# ENV NUXT_HOST=0.0.0.0

# ENV NUXT_PORT=3000

RUN npm ci
# RUN npm run build
# CMD ["npm", "run", "start"]
