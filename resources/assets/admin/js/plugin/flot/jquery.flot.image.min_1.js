/*! SmartAdmin - v1.5 - 2014-09-27 */!function(a){function b(a,b,c){var d=a.getPlotOffset();if(c.images&&c.images.show)for(var e=c.datapoints.points,f=c.datapoints.pointsize,g=0;g<e.length;g+=f){var h,i=e[g],j=e[g+1],k=e[g+2],l=e[g+3],m=e[g+4],n=c.xaxis,o=c.yaxis;if(!(!i||i.width<=0||i.height<=0||(j>l&&(h=l,l=j,j=h),k>m&&(h=m,m=k,k=h),"center"==c.images.anchor&&(h=.5*(l-j)/(i.width-1),j-=h,l+=h,h=.5*(m-k)/(i.height-1),k-=h,m+=h),j==l||k==m||j>=n.max||l<=n.min||k>=o.max||m<=o.min))){var p=0,q=0,r=i.width,s=i.height;j<n.min&&(p+=(r-p)*(n.min-j)/(l-j),j=n.min),l>n.max&&(r+=(r-p)*(n.max-l)/(l-j),l=n.max),k<o.min&&(s+=(q-s)*(o.min-k)/(m-k),k=o.min),m>o.max&&(q+=(q-s)*(o.max-m)/(m-k),m=o.max),j=n.p2c(j),l=n.p2c(l),k=o.p2c(k),m=o.p2c(m),j>l&&(h=l,l=j,j=h),k>m&&(h=m,m=k,k=h),h=b.globalAlpha,b.globalAlpha*=c.images.alpha,b.drawImage(i,p,q,r-p,s-q,j+d.left,k+d.top,l-j,m-k),b.globalAlpha=h}}}function c(a,b,c,d){b.images.show&&(d.format=[{"required":!0},{"x":!0,"number":!0,"required":!0},{"y":!0,"number":!0,"required":!0},{"x":!0,"number":!0,"required":!0},{"y":!0,"number":!0,"required":!0}])}function d(a){a.hooks.processRawData.push(c),a.hooks.drawSeries.push(b)}var e={"series":{"images":{"show":!1,"alpha":1,"anchor":"corner"}}};a.plot.image={},a.plot.image.loadDataImages=function(b,c,d){var e=[],f=[],g=c.series.images.show;a.each(b,function(b,c){(g||c.images.show)&&(c.data&&(c=c.data),a.each(c,function(a,b){"string"==typeof b[0]&&(e.push(b[0]),f.push(b))}))}),a.plot.image.load(e,function(b){a.each(f,function(a,c){var d=c[0];b[d]&&(c[0]=b[d])}),d()})},a.plot.image.load=function(b,c){var d=b.length,e={};0==d&&c({}),a.each(b,function(b,f){var g=function(){--d,e[f]=this,0==d&&c(e)};a("<img />").load(g).error(g).attr("src",f)})},a.plot.plugins.push({"init":d,"options":e,"name":"image","version":"1.1"})}(jQuery);