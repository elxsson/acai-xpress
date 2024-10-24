FROM node:18

WORKDIR /app/frontend

COPY . .
RUN npm install
RUN npm install axios

EXPOSE 3000

CMD ["npm", "start"]
