
const http  = require('http');
const query = require('querystring');
const server = http.createServer((request,response)=>{
     console.log(request.url.replace('/?',''));
});

 server.listen(8080);