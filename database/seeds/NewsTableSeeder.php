<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('news')->delete();
		
		$introduction = "Review error on WSDL when marshalling/unmarshalling with Axis 2.0 Artifacts.
		Fatal error: Uncaught SoapFault exception: [WSDL] SOAP-ERROR: Parsing Schema: can't import schema from 'http://schemas.xmlsoap.org/soap/encoding/'
		Fatal error: Uncaught SoapFault exception: [WSDL] SOAP-ERROR: Parsing Schema: unexpected <import> in schema";
		
		$introduction1 = "Review BUG 1178795 javax.xml.bind.UnmarshalException: unexpected element (uri:'', local:'items'). Expected elements are <{}item>
		resource = client.resource('http://localhost:8080/testProject/rest/items');
    ClientResponse response= resource.get(ClientResponse.class);
    String entity = response.getEntity(String.class);
    System.out.println(entity);
    JAXBContext context = JAXBContext.newInstance(Item.class);
    Unmarshaller um = context.createUnmarshaller();
    Item item = (Item) um.unmarshal(new StringReader(entity));";
		
		$content = "I am trying to create JAXB binding for xccdf-1.1.4.xsd which is a standard schema that can be obtain from XCCDF Schema Location
I am currently using EclipseLink MOXy as my JAXB implementation since I like the fact that it can also generate JSON bindings as well.
I fixed couple of occasion where I hit the infamous '[ERROR] Property 'value' is already defined' error using an external binding XML, and now I am hitting an error on
[ERROR] Property 'Any' is already defined. Use &lt;jaxb:property> to resolve this conflict.
line 441 of file:/home/dchu/Playground/Java/eclipselink_moxy/xccdf_1.1.4/xccdf-1.1.4.xsd
[ERROR] The following location is relevant to the above error
line 444 of file:/home/dchu/Playground/Java/eclipselink_moxy/xccdf_1.1.4/xccdf-1.1.4.xs
Below is a snippet of the line in the XML schema where the error occurred.
<xsd:sequence>
    <xsd:choice minOccurs='1' maxOccurs='1'>
      <xsd:any namespace='http://purl.org/dc/elements/1.1/'
               minOccurs='1' maxOccurs='unbounded'/>
      <xsd:any namespace='http://checklists.nist.gov/sccf/0.1'
               processContents='skip' 
               minOccurs='1' maxOccurs='unbounded'/>
    </xsd:choice>
</xsd:sequence>
";
		
		$news = new News();
        $news->language_id = 1;
        $news->user_id = 1;
		$news->newscategory_id = 1;
        $news->title = "BUG 1178795 - Error SOAP Enconding";
		$news->introduction = $introduction;
		$news->content = $content;
        $news->save();
        
        $news = new News();
        $news->language_id = 1;
        $news->user_id = 1;
		$news->newscategory_id = 1;
        $news->title = "BUG 1178778 - Error JAXB parsing";
		$news->introduction = $introduction1;
		$news->content = $content;
        $news->save();
        
        $news = new News();
        $news->language_id = 1;
        $news->user_id = 1;
		$news->newscategory_id = 1;
        $news->title = "BUG 1116797 - Error Java document encoding";
		$news->introduction = $introduction;
		$news->content = $content;
        $news->save();
	}

}
