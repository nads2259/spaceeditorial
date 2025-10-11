# syntax=docker/dockerfile:1.6

####
# Build static assets
####
FROM node:20-alpine AS build
WORKDIR /usr/src/app

COPY package.json package-lock.json ./
RUN npm ci --legacy-peer-deps

COPY . ./

ARG VITE_API_BASE_URL=http://localhost:8080
ARG VITE_API_TOKEN=
ARG VITE_TRACKING_BASE_URL=http://localhost:8080
ARG VITE_SITE_BASE_URL=http://localhost:3000

RUN printf "VITE_API_BASE_URL=%s\n" "$VITE_API_BASE_URL" > .env.production \
    && printf "VITE_API_TOKEN=%s\n" "$VITE_API_TOKEN" >> .env.production \
    && printf "VITE_TRACKING_BASE_URL=%s\n" "$VITE_TRACKING_BASE_URL" >> .env.production \
    && printf "VITE_SITE_BASE_URL=%s\n" "$VITE_SITE_BASE_URL" >> .env.production

RUN npm run build

####
# Nginx runtime image
####
FROM nginx:1.27-alpine

COPY docker/frontend/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=build /usr/src/app/dist /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
