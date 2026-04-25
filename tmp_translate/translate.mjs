import fs from 'fs';
import path from 'path';
import { translate } from '@vitalets/google-translate-api';

const sleep = ms => new Promise(r => setTimeout(r, ms));

async function translateText(text) {
    if (!text || typeof text !== 'string') return text;
    try {
        const res = await translate(text, { to: 'vi' });
        return res.text;
    } catch (e) {
        console.error("Error translating:", text, e.message);
        return text;
    }
}

async function translateJsonFile(inputFile, outputFile) {
    const data = JSON.parse(fs.readFileSync(inputFile, 'utf-8'));
    
    async function translateObj(obj) {
        let res = {};
        for(const k of Object.keys(obj)) {
            if (typeof obj[k] === 'string') {
                res[k] = await translateText(obj[k]);
                await sleep(100);
            } else if (typeof obj[k] === 'object' && obj[k] !== null) {
                res[k] = await translateObj(obj[k]);
            } else {
                res[k] = obj[k];
            }
        }
        return res;
    }
    
    const result = await translateObj(data);
    fs.writeFileSync(outputFile, JSON.stringify(result, null, 2));
    console.log(`Translated ${inputFile} to ${outputFile}`);
}

async function translatePhpFile(inputFile, outputFile) {
    const content = fs.readFileSync(inputFile, 'utf-8');
    const lines = content.split('\n');
    const translatedLines = [];
    
    for (let line of lines) {
        let match1 = line.match(/^(\s*'[^']+'\s*=>\s*')(.*)(',\s*)$/);
        let match2 = line.match(/^(\s*'[^']+'\s*=>\s*")([^"]*)(",\s*)$/);
        
        if (match1) {
            let newText = await translateText(match1[2]);
            newText = newText.replace(/'/g, "\\'");
            translatedLines.push(match1[1] + newText + match1[3]);
            await sleep(200);
        } else if (match2) {
            let newText = await translateText(match2[2]);
            newText = newText.replace(/"/g, '\\"');
            translatedLines.push(match2[1] + newText + match2[3]);
            await sleep(200);
        } else {
            translatedLines.push(line);
        }
    }
    fs.writeFileSync(outputFile, translatedLines.join('\n'));
    console.log(`Translated ${inputFile} to ${outputFile}`);
}

async function main() {
    const enJson = 'd:/code/web/resources/js/languages/en.json';
    const viJson = 'd:/code/web/resources/js/languages/vi.json';
    if(fs.existsSync(enJson) && !fs.existsSync(viJson)) {
        console.log('Translating JS JSON...');
        await translateJsonFile(enJson, viJson);
    }
    
    const enLangDir = 'd:/code/web/lang/en';
    const viLangDir = 'd:/code/web/lang/vi';
    if(!fs.existsSync(viLangDir)) fs.mkdirSync(viLangDir, {recursive: true});
    
    const files = fs.readdirSync(enLangDir);
    for(const file of files) {
        if(file.endsWith('.php')) {
            const outPath = path.join(viLangDir, file);
            if (!fs.existsSync(outPath)) {
                console.log('Translating ' + file + '...');
                await translatePhpFile(path.join(enLangDir, file), outPath);
            }
        }
    }
    console.log("Translation complete!");
}

main().catch(console.error);
