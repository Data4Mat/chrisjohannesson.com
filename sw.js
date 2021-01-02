var preCache = "d4m-vitals-v1.0";
var VERSION = "v1.0";
var preCache_urls = [
    "/images/chris.png",
    "/images/chrisjohannesson.png"
]


self.addEventListener('install', function (event) {
    console.log(`sw.js - install`);
    /* event.waitUntil(
         //won't delay install completing and won't cause installation to
         //fail if caching fails. 
         //the difference is as dependency returns a Promise, the  
         //no dependency does not. 
         //on install not as dependency (lazy-load) 
 
         // work on logic with caching with dependency and caching without dependency.
         caches.open(preCacheNoDependencyName)
             .then(cache => {
                 cache.addAll(PRECACHE_NO_DEPENDENCY_URLS);
                 return cache.addAll(PRECACHE_URLS);
             })
     );*/
});

self.addEventListener('activate', function (event) {
    console.log(`sw.js - activate`);
    //on activate 
    /*event.waitUntil(caches.keys()
        .then((cacheNames) => {
            cacheNames.forEach(function (value) {
                // add logic to "if" statement.
                if (value.indexOf(VERSION) < 0) {
                    caches.delete(value);
                }
            });
            return;
        })
    );*/
}); 