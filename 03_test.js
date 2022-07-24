  const http = require('http');
  const query  = require('querystring');
  const server = http.createServer((request,response)=>{
   
    var userData = "";

   request.on('data',(chunks)=>{
       //console.log(chunks.toString());
     userData += chunks.toString(); 
   });

   request.on('end',()=>{
        const data = query.parse(userData);
       // console.log(data.name,data.password);
       //response.write(data.password);

        let username  = data.name;
        let password  = data.password;

       if(username == 'mithilesh' && password == '12345678'){

          response.writeHead(200,{
             'Content-Type':'application/json'
          });

          const successMessage = JSON.stringify({
             message:"User authenticated !",
          });

          response.write(successMessage);
       }else{

           response.writeHead(401,{
              'Content-Type':'application/json'
           });

           const failedMessage = JSON.stringify({
             message:"User  Unauthenticated !",
           });

          response.write(failedMessage);
       }  


       response.end();
   });



   
  }); 


  server.listen('8080');