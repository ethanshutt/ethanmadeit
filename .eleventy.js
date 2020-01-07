const { DateTime } = require("luxon");
const pluginRSS = require("@11ty/eleventy-plugin-rss");
const markdownIt = require("markdown-it");

module.exports = function (eleventyConfig) {
    const site = require('./src/_data/site.json');
    const now = new Date();
    const livePosts = post => post.date <= now && !post.data.draft;

    // PassThrough Folders
    eleventyConfig.addPassthroughCopy("src/assets/images");
    eleventyConfig.addPassthroughCopy("src/assets/stylesheets");
    eleventyConfig.addPassthroughCopy("src/assets/scripts");

    // Filters
    eleventyConfig.addFilter("readableDate", dateObj => {
        return DateTime.fromJSDate(dateObj, { zone: 'utc' }).toFormat("DDDD");
    });

    eleventyConfig.addFilter('htmlDateString', (dateObj) => {
        return DateTime.fromJSDate(dateObj, { zone: 'utc' }).toFormat('yyyy-LL-dd');
    });
    
    //Collections    
    eleventyConfig.addCollection('recent', collection => {
        return [...collection.getFilteredByGlob('./src/writing/*.md').filter(livePosts)]
        .reverse()
        .slice(0, site.maxRecentPosts);
    });

    eleventyConfig.addCollection('archive', collection => {
        return [...collection.getFilteredByGlob('./src/writing/*.md').filter(livePosts)]
            .reverse()
    });
    
    
    eleventyConfig.addCollection('projects', collection => {
        return [
            ...collection.getFilteredByGlob('./src/for/*.md').filter(livePosts)
        ].reverse();
    });
    
    return {
        pathPrefix: "/",
        templateFormats: ["html", "njk", "md", "11ty.js"],
        markdownTemplateEngine: "njk",
        htmlTemplateEngine: 'njk',
        dir: {
            data: "./_data",
            includes: "./_includes",
            input: "./src",
            output: "./dist",
            layouts: "./_layouts"
        },
        passthroughFileCopy: true
    }
}