const express = require('express');
const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser'); 
const formidable = require('express-formidable');
const cors = require('express-cors');
const app = express();
const mongoose = require('mongoose');
const async = require('async');
require('dotenv').config();

mongoose.Promise = global.Promise;

mongoose.connect(process.env.DATABASE);


app.use(bodyParser.urlencoded({extended:true}));
app.use(bodyParser.json());
app.use(cookieParser());

app.use(function(req, res, next) {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type, Authorization');
    next();
});


//[{"_id":"5c74b7dbfee2cc5d0cb810f4",
// "Id":4,
// "Abstract":" In the originally published version of this article, the competing interests statement indicated that the authors had no competing interests; however, this statement was incorrect. The statement should have read as follows: 'M.H. receives a consultation fee from IFM Therapeutics, LLC for consultations regarding the pathogenesis and interventional strategies of neurodegenerative disease. E.L. is a scientific co-founder and consultant to IFM Therapeutics. R.M.M. declares no competing interests.' This error has been corrected in the HTML and PDF versions of the article.  ",
// "PMID":"30742056",
// "Title":"Author Correction: Inflammasome signalling in brain function and neurodegenerative disease.",
// "Authors":["Heneka MT","McManus RM","Latz E"],
// "Journal":"Nat Rev Neurosci",
// "Label":"0\n",
// "Sim":["30792538","30794058","30568296","30787427","30755253","30206749","30651603","30705424","30622366","30617260","30778835","30729425","30705427","30694922","30647434","30631118","30610512","30465250","30450503","30361893","29405033","30705428","30637601","30503716","30048237","29663735","29469679","29415737","29405028","30761689","30760196","30722937","30707392","30688235","30680615","30672825","30661940","30654755","30643300","30634989","30604281","30604006","30541602","30427512","30207235","30101709","30089514","30089306","30079925","30007759","29959887","26829844","30793432","30789229","30776004","30773387","30766479","30748078","30719813","23732229"]}

// Models
const ArticleSchema = new mongoose.Schema({});
const ArtistsSchema = new mongoose.Schema({});

const Articles = mongoose.model('articles', ArticleSchema, 'articles');
// const Artists = mongoose.model('artists', ArticleSchema, 'artists');



//api title serarch
app.get('/title/',(req,res, next)=>{
    console.log("find");
    _id = req.query.id;
    let str = _id;
    let result;
    console.log(_id);
    const reg = new RegExp(str, 'i')
    Articles.
    find(
        {Title : {$regex : reg}}
    ).
    limit(10).
    exec((err,articles)=>{
        if(err) return res.status(400).send(err);
        if (articles.length === 0){

            res.send("no");
        }else {
           res.send(articles);
        }
    })


});
// author search
app.get('/authors/',(req,res, next)=>{
    console.log("find");
    _id = req.query.id;
    let str = _id;
    let result;
    console.log(_id);
    const reg = new RegExp(str, 'i')
    Articles.
    find(
        {Authors : {$regex : reg}}
    ).
    limit(10).
    exec((err,articles)=>{
        if(err) return res.status(400).send(err);
        if (articles.length === 0){

            res.send("no");
        }else {
            res.send(articles);
        }
    })


});


//Journal

app.get('/journal',(req,res)=>{
    console.log("test");

    Articles.aggregate([
        { $group : {_id : "$Journal"}}
        ]).
    exec((err,articles)=>{
        if(err) return res.status(400).send(err);

        res.send(articles);
    })

});

//author
app.get('/author',(req,res)=>{
    console.log("test");

    Articles.aggregate([
        { $group : {_id : "$Authors"}}
    ]).
    exec((err,articles)=>{
        if(err) return res.status(400).send(err);

        res.send(articles);
    })

});



//
// app.post('/pmid',(req,res)=>{
//     let str = req.body.pmid;
//     console.log(req.body);
//     Articles.
//     find().
//     where('PMID').equals(str).
//     exec((err,articles)=>{
//     if(err) return res.status(400).send(err);
//     res.send(articles);
//     })
// });

app.get('/PMID/',(req,res)=>{
    _id = req.query.id;
    let str = _id;

    Articles.
    find().
    where('PMID').equals(str).
    exec((err,articles)=>{
        if(err) return res.status(400).send(err);
        res.send(articles);
    })

});


// Middlewares
// const { auth } = require('./middleware/auth');
// const { admin } = require('./middleware/admin');

//
// app.get('/api/auth',auth(User),(req,res)=>{
//     res.status(200).json({
//         isAdmin: req.user.role === 0 ? false : true,
//         isAuth: true,
//         email: req.user.email,
//         name: req.user.name,
//         lastname: req.user.lastname,
//         role: req.user.role,
//         cart: req.user.cart,
//         history: req.user.history
//     })
// });
//


// app.post('/api/login',(req,res)=>{
//     User.findOne({'email':req.body.email},(err,user)=>{
//         if(!user) return res.json({loginSuccess:false,message:'Auth failed, email not found'});
//         user.comparePassword(req.body.password,(err,isMatch)=>{
//             if(!isMatch) return res.json({loginSuccess:false,message:'Wrong password'});
//             user.generateToken((err,user)=>{
//                 if(err) return res.status(400).send(err);
//                 res.cookie('w_auth',user.token).status(200).json({
//                     user_name : user.name,
//                     loginSuccess: true
//                 })
//             })
//         })
//     })
// });


// app.get('/api/logout',auth(User),(req,res)=>{
//     User.findOneAndUpdate(
//         { _id:req.user._id },
//         { token: '' },
//         (err,doc)=>{
//             if(err) return res.json({success:false,err});
//             return res.status(200).send({
//                 success: true
//             })
//         }
//     )
// });
//
// app.post('/api/articles',(req,res)=>{
//     let c = req.body.keywords[0];
//     let str = '';
//     if (c >= '0' && c <= '9') {
//         str = req.body.keywords;
//         Articles.
//         find().
//         where('PMID').equals(str).
//         exec((err,articles)=>{
//             if(err) return res.status(400).send(err);
//             res.send(articles);
//             x = articles[0].toObject()
//             console.log(x.Title)
//         })
//     } else {
//
//     }
// });
//
// app.post('/api/userartlist', (req,res)=>{
//     Tests.
//     find().
//     exec((err,articles)=>{
//     if(err) return res.status(400).send(err);
//     res.send(articles);
//     })
// })
//
// app.post('/api/userrec', (req,res)=>{
//     User.
//     find().
//     exec((err,articles)=>{
//     if(err) return res.status(400).send(err);
//     res.send(articles);
//     })
// })
//
//
// app.post('/api/rec',(req,res)=>{
//     let str = req.body.pmid;
//     Articles.
//     find().
//     where('PMID').equals(str).
//     exec((err,articles)=>{
//     if(err) return res.status(400).send(err);
//     res.send(articles);
//     })
// });

const port = process.env.PORT || 3002;
app.listen(port,()=>{
    console.log(`Server Running at ${port}`)
})