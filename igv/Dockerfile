FROM node:8-jessie
LABEL key="CASTIC FIU EDU Joseph Martinez"

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
RUN git clone https://github.com/igvteam/igv-webapp.git

WORKDIR /usr/src/app/igv-webapp

RUN npm install grunt
# If you are building your code for production
# RUN npm ci --only=production

EXPOSE 8080
CMD [ "npm", "start" ]