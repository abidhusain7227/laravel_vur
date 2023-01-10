const baseUrl = window.location.protocol+"//"+window.location.hostname+"/";
const image_baseUrl =  process.env.MIX_STORAGE_PATH;
export default {

  applogo: image_baseUrl + 'media/foodapp/original/'+window.applogo,
  appurl: baseUrl,
  api_url: baseUrl + 'api/',
  media_path: baseUrl + 'public/',
  basepath: baseUrl + 'public/images/',
  
}