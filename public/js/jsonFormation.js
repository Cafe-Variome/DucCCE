var MakeJason = (x)=>{

    let JsontoDownload = [];
    let _jsontoDownload ={}
    _jsontoDownload["DucProfile"] = x["profile"];
    _jsontoDownload["DucProfile"]["resources"] = x["resource"];
    _jsontoDownload["DucProfile"]["conditions"] = x["Conditions"];
    _jsontoDownload["DucProfile"]["comments"] = x["Comments"];
    JsontoDownload.push(_jsontoDownload);

    return JsontoDownload;

}
