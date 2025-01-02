import BerandaLayout from "@/Layouts/BerandaLayout";
import { Link, usePage } from "@inertiajs/react";
import React from "react";

const Article = () => {
    const { articles } = usePage().props;

    return (
        <div className="flex py-10 flex-wrap justify-center gap-5">
            {articles.length === 0 ? (
                <div>No articles available.</div>
            ) : (
                articles.map((article) => (
                    <div key={article.id_article} className="p-4">
                        <div className="bg-white rounded-lg shadow-md overflow-hidden w-[320px] h-[400px] flex flex-col">
                            <img
                                src={`/assets/uploads/article_cover/${article.cover_article}`}
                                alt={article.judul}
                                className="w-full h-[192px] object-cover"
                            />
                            <div className="p-4 flex-1">
                                <h3 className="text-lg font-bold text-gray-800">
                                    {article.judul}
                                </h3>
                                <span className="text-sm text-gray-500">
                                    {new Date(article.created_at).toLocaleDateString()}
                                </span>
                                <p className="text-gray-600 mt-2 line-clamp-3">
                                    {article.deskripsi}
                                </p>
                            </div>
                            <div className="p-4 border-t border-gray-200">
                                <Link
                                    href={`/article/${article.id_article}`}
                                    className="text-blue-500 hover:text-blue-600 font-semibold"
                                >
                                    Selengkapnya
                                </Link>
                            </div>
                        </div>
                    </div>
                ))
            )}
        </div>
    );
};

Article.layout = (page) => <BerandaLayout>{page}</BerandaLayout>;

export default Article;
