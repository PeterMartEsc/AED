FROM node:lts-alpine3.10 AS node-for-build
RUN mkdir app
WORKDIR /app
COPY . .
RUN npm install && npm run build
FROM nginx:stable-alpine3.20 AS nginx-server
COPY --from=node-for-build /app/build /usr/share/nginx/html
EXPOSE 80
CMD ["nginx","-g","daemon off;"]
